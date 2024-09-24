<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Styles -->
        <style>
.brutalist-card {
  width: 520px;
  border: 4px solid #000;
  background-color: #fff;
  padding: 1.5rem;
  box-shadow: 10px 10px 0 #000;
  font-family: "Arial", sans-serif;
}

.brutalist-card__header {
  display: flex;
  align-items: center;
  gap: 1rem;
  margin-bottom: 1rem;
  border-bottom: 2px solid #000;
  padding-bottom: 1rem;
}

.brutalist-card__icon {
  flex-shrink: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: #000;
  padding: 0.5rem;
}

.brutalist-card__icon svg {
  height: 1.5rem;
  width: 1.5rem;
  fill: #fff;
}

.brutalist-card__alert {
  font-weight: 900;
  color: #000;
  font-size: 1.5rem;
  text-transform: uppercase;
}

.brutalist-card__message {
  margin-top: 1rem;
  color: #000;
  font-size: 0.9rem;
  line-height: 1.4;
  border-bottom: 2px solid #000;
  padding-bottom: 1rem;
  font-weight: 600;
}

.brutalist-card__actions {
  margin-top: 1rem;
}

.brutalist-card__button {
  display: block;
  width: 100%;
  padding: 0.75rem;
  text-align: center;
  font-size: 1rem;
  font-weight: 700;
  text-transform: uppercase;
  border: 3px solid #000;
  background-color: #fff;
  color: #000;
  position: relative;
  transition: all 0.2s ease;
  box-shadow: 5px 5px 0 #000;
  overflow: hidden;
  text-decoration: none;
  margin-bottom: 1rem;
}

.brutalist-card__button--read {
  background-color: #000;
  color: #fff;
}

.brutalist-card__button::before {
  content: "";
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(
    120deg,
    transparent,
    rgba(255, 255, 255, 0.3),
    transparent
  );
  transition: all 0.6s;
}

.brutalist-card__button:hover::before {
  left: 100%;
}

.brutalist-card__button:hover {
  transform: translate(-2px, -2px);
  box-shadow: 7px 7px 0 #000;
}

.brutalist-card__button--mark:hover {
  background-color: #296fbb;
  border-color: #296fbb;
  color: #fff;
  box-shadow: 7px 7px 0 #004280;
}

.brutalist-card__button--read:hover {
  background-color: #ff0000;
  border-color: #ff0000;
  color: #fff;
  box-shadow: 7px 7px 0 #800000;
}

.brutalist-card__button:active {
  transform: translate(5px, 5px);
  box-shadow: none;
}


        </style>
    </head>
    <body>
        <center>
            <div class="brutalist-card">
              <div class="brutalist-card__header">
                <div class="brutalist-card__icon">
                </div>
                <div class="brutalist-card__alert">INVOICE</div>
              </div>
              <div class="brutalist-card__actions">
                <a class="brutalist-card__button brutalist-card__button--mark" href="{{ route ('invoice') }}"
                  >Invoice</a
                >
                <a class="brutalist-card__button brutalist-card__button--mark" href="{{ route ('invoicepasien') }}"
                >Invoice Pasien</a
              >
              <a class="brutalist-card__button brutalist-card__button--mark" href="{{ route ('invoicepengobatan') }}"
              >Invoice Pengobatan</a
            >
              </div>
            </div>            
        </center>
    </body>
</html>
