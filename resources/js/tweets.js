const hiddenTweetsUrl = $("#url").val();

window.hideTweet = async (e, tweetId) => {
    disableButton(e);

    await axios.post(hiddenTweetsUrl, { tweet_id: tweetId })
        .then(response => {
            setTweetButtonToHidden(e, tweetId);
            enableButton(e);
        })
        .catch(e => {
            console.error(e);
            enableButton(e);
        });
}

window.showTweet = async (e, tweetId) => {
    disableButton(e);

    await axios.delete(hiddenTweetsUrl + "/" + tweetId)
        .then(response => {
            setTweetButtonToShowing(e, tweetId);
            enableButton(e);
        })
        .catch(e => {
            console.error(e);
            enableButton(e);
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

window.console.log(hiddenTweetsUrl);
