// src/pages/Calculator.js
import { useState, useEffect } from "react";
import { useAuth } from "../context/AuthContext";
import { useNavigate } from "react-router-dom";

function Calculator() {
    const [loan, setLoan] = useState("");
    const [interest, setInterest] = useState("");
    const [years, setYears] = useState("");
    const [payment, setPayment] = useState(null);
    const [errors, setErrors] = useState({});
    const [showScroll, setShowScroll] = useState(false);

    const { user, logout } = useAuth();
    const navigate = useNavigate();

    useEffect(() => {
        const handleScroll = () => {
            setShowScroll(window.scrollY > 100);
        };
        window.addEventListener("scroll", handleScroll);
        return () => window.removeEventListener("scroll", handleScroll);
    }, []);

    const handleLogout = () => {
        logout();
        navigate("/login");
    };

    const calculate = () => {
        const newErrors = {};

        if (loan === "") {
            newErrors.loan = "Podaj kwotę kredytu";
        } else if (isNaN(loan) || Number(loan) <= 0) {
            newErrors.loan = "Kwota musi być liczbą dodatnią";
        }

        if (interest === "") {
            newErrors.interest = "Podaj oprocentowanie";
        } else if (isNaN(interest) || Number(interest) <= 0) {
            newErrors.interest = "Oprocentowanie musi być dodatnie";
        }

        if (years === "") {
            newErrors.years = "Podaj liczbę lat";
        } else if (isNaN(years) || Number(years) <= 0 || Number(years) > 50) {
            newErrors.years = "Liczba lat musi być dodatnia (max 50)";
        }

        setErrors(newErrors);

        if (Object.keys(newErrors).length === 0) {
            const P = parseFloat(loan);
            const r = parseFloat(interest) / 100 / 12;
            const n = parseFloat(years) * 12;

            let result;
            if (r === 0) {
                result = P / n;
            } else {
                result = P * (r * Math.pow(1 + r, n)) / (Math.pow(1 + r, n) - 1);
            }

            setPayment(result.toFixed(2));
        }
    };

    return (
        <div>
            {/* Header */}
            <header id="header" className="header d-flex align-items-center sticky-top">
                <div className="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
                    <a href="#hero" className="logo d-flex align-items-center">
                        <h1 className="sitename"><span>e</span>Startup</h1>
                    </a>
                    <nav id="navmenu" className="navmenu">
                        <ul>
                            <li><a href="#hero" className="active">Home</a></li>
                            <li>
                <span style={{ color: "white", marginRight: "15px" }}>
                  Witaj, {user?.username}!
                </span>
                            </li>
                            <li>
                                <button onClick={handleLogout} className="btn btn-outline-light btn-sm">
                                    Wyloguj
                                </button>
                            </li>
                        </ul>
                    </nav>
                </div>
            </header>

            <main className="main">
                {/* Hero Section */}
                <section id="hero" className="hero section light-background">
                    <div className="container position-relative">
                        <div className="row gy-5">
                            <div className="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                                <h2>Calculator</h2>
                                <p>Wylicz miesięczną ratę kredytu</p>
                                <div className="d-flex">
                                    <a href="#contact" className="btn-get-started">Get Started</a>
                                </div>
                            </div>
                            <div className="col-lg-6 order-1 order-lg-2">
                                <img src="/assets/img/hero-img.png" className="img-fluid" alt="" />
                            </div>
                        </div>
                    </div>
                </section>

                {/* Calculator Section */}
                <section id="contact" className="contact section">
                    <div className="container section-title">
                        <h2>Kalkulator kredytu</h2>
                    </div>

                    <div className="container">
                        <div className="row gy-4">

                            {/* Result */}
                            <div className="col-lg-4">
                                <div className="info-item d-flex flex-column justify-content-center text-center">
                                    <h3>Wynik</h3>
                                    {payment !== null ? (
                                        <p style={{ fontSize: "24px", fontWeight: "bold" }}>
                                            {payment} zł / miesiąc
                                        </p>
                                    ) : (
                                        <p>Wprowadź dane, aby zobaczyć wynik</p>
                                    )}
                                </div>
                            </div>

                            {/* Form */}
                            <div className="col-lg-8">
                                <div className="row gy-4">
                                    <div className="col-md-12">
                                        <input
                                            type="text"
                                            className="form-control"
                                            placeholder="Kwota kredytu"
                                            value={loan}
                                            onChange={(e) => setLoan(e.target.value)}
                                        />
                                        <div style={{ color: "red" }}>{errors.loan}</div>
                                    </div>

                                    <div className="col-md-12">
                                        <input
                                            type="text"
                                            className="form-control"
                                            placeholder="Oprocentowanie"
                                            value={interest}
                                            onChange={(e) => setInterest(e.target.value)}
                                        />
                                        <div style={{ color: "red" }}>{errors.interest}</div>
                                    </div>

                                    <div className="col-md-12">
                                        <input
                                            type="text"
                                            className="form-control"
                                            placeholder="Liczba lat"
                                            value={years}
                                            onChange={(e) => setYears(e.target.value)}
                                        />
                                        <div style={{ color: "red" }}>{errors.years}</div>
                                    </div>

                                    <div className="col-md-12 text-center">
                                        <button onClick={calculate} className="btn btn-primary">
                                            Oblicz
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
            </main>

            {/* Scroll Top */}
            <button
                onClick={() => window.scrollTo({ top: 0, behavior: "smooth" })}
                id="scroll-top"
                className={`scroll-top d-flex align-items-center justify-content-center ${showScroll ? "active" : ""}`}
            >
                <i className="bi bi-arrow-up-short"></i>
            </button>
        </div>
    );
}

export default Calculator;