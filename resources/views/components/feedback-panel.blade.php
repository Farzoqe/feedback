<div class="feedback-panel" id="feedbackPanel" style="display: none;">
    <div class="feedback-trigger" onclick="toggleFeedbackPanel()">
        FEEDBACK
    </div>
    <form class="feedback-form" id="feebackForm" onsubmit="handleFeedbackSubmit(event)" method="post" action="javascript:;">
        <div>
            <strong>Report a Bug, Suggestion or Improvement</strong>
        </div>
        @csrf
        <div class="input-group">
            <label>Subject</label>
            <input type="text" name="subject" required>
        </div>
        <div class="input-group">
            <label>Description</label>
            <textarea rows="5" name="description" required></textarea>
        </div>
        <input type="hidden" name="url" value="{{request()->getUri()}}">
        <button class="btn btn-primary">Submit</button>
        <div class="alert alert-success hidden" id="feedbackSuccessMessage">
            Your feedback has been submitted. We shall be in touch soon!
        </div>
    </form>
</div>
<link rel="stylesheet" href="{{ asset('vendor/feedback/feedback.css') }}">
<script src="{{ asset('vendor/feedback/feedback.js') }}"></script>
