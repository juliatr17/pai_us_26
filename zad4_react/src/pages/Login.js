// src/pages/Login.js
import { useState } from "react";
import { useAuth } from "../context/AuthContext";
import { useNavigate } from "react-router-dom";

function Login() {
    const [username, setUsername] = useState("");
    const [password, setPassword] = useState("");
    const [error, setError] = useState("");

    const { login } = useAuth();
    const navigate = useNavigate();

    const handleLogin = (e) => {
        e.preventDefault();
        const success = login(username, password);
        if (success) {
            navigate("/calculator");
        } else {
            setError("Nieprawidłowy login lub hasło");
        }
    };

    return (
        <div className="container d-flex justify-content-center align-items-center"
             style={{ minHeight: "100vh" }}>
            <div className="card p-4" style={{ width: "400px" }}>
                <h2 className="text-center mb-4">Logowanie</h2>

                <div className="mb-3">
                    <input
                        type="text"
                        className="form-control"
                        placeholder="Login"
                        value={username}
                        onChange={(e) => setUsername(e.target.value)}
                    />
                </div>

                <div className="mb-3">
                    <input
                        type="password"
                        className="form-control"
                        placeholder="Hasło"
                        value={password}
                        onChange={(e) => setPassword(e.target.value)}
                    />
                </div>

                {error && (
                    <div className="alert alert-danger">{error}</div>
                )}

                <button onClick={handleLogin} className="btn btn-primary w-100">
                    Zaloguj się
                </button>
            </div>
        </div>
    );
}

export default Login;