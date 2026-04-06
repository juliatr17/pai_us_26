{extends file='layouts/layout.tpl'}

{block name='title'}Kalkulator kredytu - eStartup{/block}

{block name='content'}
    <!-- Hero Section -->
    <section id="hero" class="hero section light-background">
        <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-5">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h2>Calculator</h2>
                    <p>Wylicz miesięczną ratę kredytu</p>
                    <div class="d-flex">
                        <a href="#contact" class="btn-get-started">Get Started</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                    <img src="assets/img/hero-img.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section><!-- /Hero Section -->

    <section id="contact" class="contact section">
        <div class="container section-title">
            <h2>Kalkulator kredytu</h2>
        </div>

        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-4">
                    <div class="info-item d-flex flex-column justify-content-center text-center">
                        <h3>Wynik</h3>
                        {if $payment !== null && $payment !== ""}
                            <p style="font-size: 24px; font-weight: bold;">
                                {$payment|round:2} zł / miesiąc
                            </p>
                        {else}
                            <p>Wprowadź dane, aby zobaczyć wynik</p>
                        {/if}
                    </div>
                </div>

                <div class="col-lg-8">
                    <form method="GET" action="calc.php">
                        <div class="row gy-4">
                            <div class="col-md-12">
                                <input type="text" name="loan" class="form-control"
                                       placeholder="Kwota kredytu"
                                       value="{$loan}">
                                <div style="color:red">{$errorLoan}</div>
                            </div>

                            <div class="col-md-12">
                                <input type="text" name="interest" class="form-control"
                                       placeholder="Oprocentowanie"
                                       value="{$interest}">
                                <div style="color:red">{$errorInterest}</div>
                            </div>

                            <div class="col-md-12">
                                <input type="text" name="years" class="form-control"
                                       placeholder="Liczba lat"
                                       value="{$years}">
                                <div style="color:red">{$errorYears}</div>
                            </div>

                            <div class="col-md-12 text-center">
                                <button type="submit">Oblicz</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section><!-- /Contact Section -->
{/block}