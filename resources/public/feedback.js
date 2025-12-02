function toggleFeedbackPanel() {
    document.getElementById('feedbackPanel').classList.toggle('show');
}

async function handleFeedbackSubmit(e) {
    let body = new FormData(e.target)
    await fetch('/feedback', {
        method: "POST",
        body
    });
    document.getElementById('feedbackSuccessMessage').classList.remove('hidden')
}
