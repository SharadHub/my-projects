let targetNumber = Math.floor(Math.random() * 100) + 1;
let attempts = 0;

function checkGuess() {
    const userGuess = Number(document.getElementById('guessInput').value);
    const message = document.getElementById('message');
    attempts++;

    if (userGuess === targetNumber) {
        message.textContent = `Congratulations! You guessed it in ${attempts} attempts!`;
        message.style.color = 'green';
        disableInput();
    } else if (userGuess < targetNumber) {
        message.textContent = 'Try higher!';
        message.style.color = 'red';
    } else {
        message.textContent = 'Try lower!';
        message.style.color = 'red';
    }
}

function disableInput() {
    document.getElementById('guessInput').disabled = true;
    document.querySelector('button').disabled = true;
}

function restartGame() {
    targetNumber = Math.floor(Math.random() * 100) + 1;
    attempts = 0;
    document.getElementById('guessInput').disabled = false;
    document.querySelector('button').disabled = false;
    document.getElementById('message').textContent = '';
    document.getElementById('guessInput').value = '';
}