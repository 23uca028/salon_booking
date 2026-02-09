document.getElementById("bookingForm")?.addEventListener("submit", e => {
  e.preventDefault();
  alert("✅ Appointment booked successfully!");
  e.target.reset();
});
