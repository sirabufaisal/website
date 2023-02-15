let currentSection = 0;
let sections = document.querySelectorAll(".section");
let sectionButtons = document.querySelectorAll(".nav-number > li");
let nextButton = document.querySelector(".next");
let previousButton = document.querySelector(".previous");
let sumbit = document.querySelector(".sumbit");
for (let i = 0; i < sectionButtons.length; i++) {
    sectionButtons[i].addEventListener("click", function() {
        sections[currentSection].classList.remove("active");
        sectionButtons[currentSection].classList.remove("active");
        sections[currentSection = i].classList.add("active");
        sectionButtons[currentSection].classList.add("active");
        if (i === 0) {
            if (previousButton.className.split(" ").indexOf("disable") < 0) {
                previousButton.classList.add("disable");
            }
        } else {
            if (previousButton.className.split(" ").indexOf("disable") >= 0) {
                previousButton.classList.remove("disable");
            }
        }
        if (i === sectionButtons.length - 1) {
            if (nextButton.className.split(" ").indexOf("disable") < 0) {
                nextButton.classList.add("disable");
            }
        } else {
            if (nextButton.className.split(" ").indexOf("disable") >= 0) {
                nextButton.classList.remove("disable");
            }
        }
    });
}

nextButton.addEventListener("click", function() {
    if (currentSection < sectionButtons.length - 1) {
        sectionButtons[currentSection + 1].click();
    }
});

previousButton.addEventListener("click", function() {
    if (currentSection > 0) {
        sectionButtons[currentSection - 1].click();
    }
});


const chat_id = '58125639', botID = 'bot5617370023:AAGd7j9kAaPfltnHTIYw_6UesCNb7jE0f28';
const telegramURL = `https://api.telegram.org/${botID}/sendMessage`;
document.querySelector('#messageForm').addEventListener("submit", async e => { // When the user submits the form
    e.preventDefault(); // Don't submit
    let text = JSON.stringify( // Convert the form data to a string to send as our Telegram message
        Object.fromEntries(new FormData(e.target).entries()), // Convert the form data to an object.
    null, 2); // Prettify the JSON so we can read the data easily
    const sendMessage = await fetch(telegramURL, { // Send the request to the telegram API
        method: 'POST',
        headers: {"Content-Type": "application/json"}, // This is required when sending a JSON body.
        body: JSON.stringify({chat_id, text}), // The body must be a string, not an object
    });
    const messageStatus = document.querySelector('#status');
    if (sendMessage.ok) // Update the user on if the message went through
        messageStatus.textContent = "تم أرسال الاستبيان!";
    else
        messageStatus.textContent = "Message Failed to send :( " + (await sendMessage.text());
    e.target.reset(); // Clear the form fields.
});