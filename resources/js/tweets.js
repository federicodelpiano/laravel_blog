const hiddenTweetsUrl = $("#url").val();

window.hideTweet = async (button, tweetId) => {
    disableButton(button);
    await axios.post(hiddenTweetsUrl, { tweet_id: tweetId })
        .then(response => {
            setTweetButtonToHidden(button, tweetId);
            enableButton(button);
        })
        .catch(err => {
            console.error(err);
            enableButton(button);
        });
}

window.showTweet = async (button, tweetId) => {
    disableButton(button);
    await axios.delete(hiddenTweetsUrl + "/" + tweetId)
        .then(response => {
            setTweetButtonToShowing(button, tweetId);
            enableButton(button);
        })
        .catch(err => {
            console.error(err);
            enableButton(button);
        });
}

window.disableButton = button => {
    button.onclick = null;
    button.disabled = true;
    button.classList.add("disabled");
}

window.enableButton = button => {
    button.disabled = false;
    button.classList.remove("disabled");
}

window.setTweetButtonToHidden = (button, tweetId) => {
    button.innerHTML = '<i class="fas fa-eye-slash"></i> Hidden';
    button.classList.remove("btn-primary", "showing-button");
    button.classList.add("btn-secondary", "hidden-button");
    button.onclick = function () {
        showTweet(button, tweetId);
    }
}

window.setTweetButtonToShowing = (button, tweetId) => {
    button.innerHTML = '<i class="fas fa-eye"></i> Showing';
    button.classList.remove("btn-secondary", "hidden-button");
    button.classList.add("btn-primary", "showing-button");
    button.onclick = function () {
        hideTweet(button, tweetId);
    }
}
