<div class="schedule-picker__container">
    <div class="title-container">
        <div class="cinema-name__container">
            <img loading="lazy"
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/96ed6622c9dba11b0894363b2f38395ed612e9461e4aede93f19c5c1bcb78cac?"
                class="img" />
            <div class="name">GRAND INDONESIA CGV</div>
        </div>
        <div class="cinema">CGV</div>
    </div>
    <div class="cinema-address">JL. MH. TAHMRIN NO.1</div>
    <div class="cinema-type">
        <div class="name">REGULAR 2D</div>
        <div class="price">Rp. 45.000 - 50.000</div>
    </div>
    <div class="time-container">
        <div class="time-item">11:00</div>
        <div class="time-item">13:45</div>
        <div class="time-item">14:40</div>
        <div class="time-item">15:40</div>
        <div class="time-item">17:15</div>
        <div class="time-item">18:15</div>
        <div class="time-item">20:00</div>
        <div class="time-item">21:00</div>
    </div>
    <div class="cinema-type">
        <div class="name">GOLD CLASS 2D</div>
        <div class="price">Rp. 100.000</div>
    </div>
    <div class="time-container">
        <div class="time-item">11:00</div>
        <div class="time-item">13:45</div>
        <div class="time-item">14:40</div>
        <div class="time-item">15:40</div>
        <div class="time-item">17:15</div>
        <div class="time-item">18:15</div>
        <div class="time-item">20:00</div>
        <div class="time-item">21:00</div>
    </div>


</div>
<style>
body {
    font-family: Roboto, sans-serif;
}

.schedule-picker__container {
    display: flex;
    max-width: 638px;
    flex-direction: column;
    margin-top: 42px;
}

.schedule-picker__container .title-container {
    justify-content: space-between;
    display: flex;
    width: 100%;
    gap: 20px;
}

@media (max-width: 991px) {
    .schedule-picker__container .title-container {
        max-width: 100%;
        flex-wrap: wrap;
    }
}

.schedule-picker__container .title-container .cinema-name__container {
    display: flex;
    padding-right: 20px;
    gap: 16px;
    font-size: 24px;
    color: var(--Shade-900, #333);
    font-weight: 500;
    line-height: 133%;
}

.schedule-picker__container .title-container .cinema-name__container .img {
    aspect-ratio: 1;
    object-fit: auto;
    object-position: center;
    width: 32px;
}



.schedule-picker__container .title-container .cinema {
    justify-content: center;
    border-radius: 4px;
    background-color: #EC1E2B;
    color: var(--Shade-100, #fff);
    white-space: nowrap;
    text-align: center;
    margin: auto 0;
    padding: 6px 8px;
    font: 700 12px Roboto, sans-serif;
}

@media (max-width: 991px) {
    .schedule-picker__container .title-container .cinema {
        white-space: initial;
    }
}

.schedule-picker__container .cinema-address {
    color: var(--Shade-600, #5a637a);
    margin-top: 18px;
    width: 100%;
    font: 400 16px/150% Roboto, sans-serif;
}

@media (max-width: 991px) {
    .schedule-picker__container .cinema-address {
        max-width: 100%;
    }
}

.schedule-picker__container .cinema-type {
    justify-content: space-between;
    display: flex;
    margin-top: 24px;
    width: 100%;
    gap: 20px;
    color: var(--Shade-600, #5a637a);

}

@media (max-width: 991px) {
    .schedule-picker__container .cinema-type {
        max-width: 100%;
        flex-wrap: wrap;
    }
}

.schedule-picker__container .cinema-type .name {
    font: 500 24px/133% Roboto, sans-serif;
}

.schedule-picker__container .cinema-type .price {
    text-align: right;
    margin: auto 0;
    font: 400 18px/156% Roboto, sans-serif;
}

.schedule-picker__container .time-container {
    align-self: start;
    display: flex;
    margin-top: 16px;
    max-width: 362px;
    flex-wrap: wrap;
    gap: 18px;
    font-size: 14px;
    color: var(--Shade-400, #9da8be);
    font-weight: 700;
    white-space: nowrap;

}

@media (max-width: 991px) {
    .schedule-picker__container .time-container {
        white-space: initial;
    }
}

.schedule-picker__container .time-item {
    font-family: Roboto, sans-serif;
    justify-content: center;
    border-radius: 4px;
    background-color: var(--Shade-200, #dadfe8);
    padding: 12px 20px;
}

@media (max-width: 991px) {
    .schedule-picker__container .time-item {
        white-space: initial;
    }
}
</style>