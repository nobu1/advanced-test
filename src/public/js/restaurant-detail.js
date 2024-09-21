
const reservationInputDate = document.getElementById('form__input-date');
const reservationDate = document.getElementById('reservation-date');
reservationInputDate.addEventListener("input", function() {
    reservationDate.innerHTML = this.value;
  });


const reservationInputTime = document.getElementById('form__input-time');
const reservationTime = document.getElementById('reservation-time')
reservationInputTime.addEventListener("input", function() {
    reservationTime.innerHTML = this.value;
});

const reservationInputNumber = document.getElementById('form__input-people');
const reservationNumber = document.getElementById('reservation-number')
reservationInputNumber.addEventListener("input", function() {
    reservationNumber.innerHTML = this.value;
});
