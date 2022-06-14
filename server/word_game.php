<?php
require('header.php');
?>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

<style>
    .blinking {
        animation: blinkingText 1.2s infinite;
    }

    @keyframes blinkingText {
        0% {
            color: #009394;
        }
        49% {
            color: #009394;
        }
        60% {
            color: transparent;
        }
        99% {
            color: transparent;
        }
        100% {
            color: #009394;
        }
    }
</style>
<?php
echo showAds($q, 'body-top', $conn);
?>

<div class="box_wrapper">
    <fieldset>
        <legend><span class="custom_font2"><h1>Word Guessing Game</h1></span></legend>

        <div class="row">
            <div class="col-lg-12 text-center pb-3">
                <p>
                <h1 id="welcome" class="blinking" style="text-align: center;">Press Any Key To Get Started!</h2></p>
                <div><h3>Word: <span id="currentWord"></span></h3></div>
                <div><h3><span id="losing" style="color: red"></span></h3></div>
                <div><h3>Meaning: <span id="wordMeaning"></span></h3></div>
                <br>
                <div><h6>Wins: <span id="totalWins" class="varColor"></span></h6></div>

                <div><h6>Guesses Left: <span id="remainingGuesses" class="varColor"></span></h6></div>

                <div><h6>Already Guessed: <span id="guessedLetters" class="varColor"></span></h6></div>

            </div>
        </div>

    </fieldset>
</div>
</div>

<?php include('right-content.php'); ?>
<?php require('footer.php'); ?>


<script>

    var guessedLetters = [];
    var guessingWord = [];
    var usedGuessingwWords = [];
    var wordToMatch;
    var numGuess;
    var wins = 0;
    var pause = false; // This var and setTimout function to not listen for keypress while game resets

    //Starts game
    function initializeGame() {
		document.getElementById("losing").innerText = '';
        var language = '<?= $lang?>';

        $.ajax({
            type: "get",
            url: location.protocol + "//" + location.host + "/get3000words.php",
            data: {
                language: language,
            },
            success: function (t) {
                var array = jQuery.parseJSON(t);
                var possibleWords = Object.keys(array);
                wordToMatch = possibleWords[Math.floor(Math.random() * possibleWords.length)].toUpperCase();
                meaning = array[wordToMatch.toLowerCase()];

                // Set number of guesses (higher or lower) based on word length
                if (wordToMatch.length <= 4) {
                    numGuess = 4
                } else if (wordToMatch.length > 4 && wordToMatch.length <= 7) {
                    numGuess = Math.floor(wordToMatch.length * .67)
                } else if (wordToMatch.length > 7 && wordToMatch.length <= 10) {
                    numGuess = Math.floor(wordToMatch.length * .5)
                } else if (wordToMatch.length > 10 && wordToMatch.length <= 14) {
                    numGuess = Math.floor(wordToMatch.length * .52)
                } else if (wordToMatch.length > 14) {
                    numGuess = 7;
                }

                // Get underscores for guessingWord from wordToMatch
                for (var i = 0; i < wordToMatch.length; i++) {
                    // Put a space instead of an underscore between multi-word options in possibleWords array
                    if (wordToMatch[i] === " ") {
                        guessingWord.push(" ")
                    } else {
                        guessingWord.push("_ ");
                    }

                }
                updateDisplay();
            },
            error: function () {
                console.log("error")
            }
        })

    };

    //Reset the game
    function resetGame() {
		document.getElementById("losing").innerText = '';
        var language = '<?= $lang?>';

        $.ajax({
            type: "get",
            url: location.protocol + "//" + location.host + "/get3000words.php",
            data: {
                language: language,
            },
            success: function (t) {
                var array = jQuery.parseJSON(t);
                var possibleWords = Object.keys(array);

                if (usedGuessingwWords.length === possibleWords.length) {
                    // Toggle line comment on for almost the entire possibleWords array to hear this end of game sound clip
                    usedGuessingwWords = []
                    wins = 0
                    setTimeout(resetGame, 6000); // Note for future change - shorten possibleWords, make jumbotron display congratulatory message upon guessing all possibilites
                } else {
                    pause = false;
                    // Restores blinking "...get started" message
                    document.getElementById('welcome').className = 'blink';

                    wordToMatch = possibleWords[Math.floor(Math.random() * possibleWords.length)].toUpperCase();
                    meaning = array[wordToMatch.toLowerCase()];
                    // If new word has already been used randomly select another
                    if (usedGuessingwWords.includes(wordToMatch) === true) {
                        resetGame();
                    }

                    // Set number of guesses (higher or lower) based on word length
                    if (wordToMatch.length <= 4) {
                        numGuess = 4
                    } else if (wordToMatch.length > 4 && wordToMatch.length <= 7) {
                        numGuess = Math.floor(wordToMatch.length * .67)
                    } else if (wordToMatch.length > 7 && wordToMatch.length <= 10) {
                        numGuess = Math.floor(wordToMatch.length * .5)
                    } else if (wordToMatch.length > 10 && wordToMatch.length <= 14) {
                        numGuess = Math.floor(wordToMatch.length * .52)
                    } else if (wordToMatch.length > 14) {
                        numGuess = 7;
                    }

                    // Reset word arrays
                    guessedLetters = [];
                    guessingWord = [];

                    // Reset the guessed word
                    for (var i = 0; i < wordToMatch.length; i++) {
                        // Put a space instead of an underscore between multi-word options in possibleWords array
                        if (wordToMatch[i] === " ") {
                            guessingWord.push(" ")
                        } else {
                            guessingWord.push("_ ");
                        }
                    }
                    updateDisplay();
                }


            }, error: function () {
                console.log("error")
            }
        })


    };

    // Update the Display
    function updateDisplay() {
		
        document.getElementById("totalWins").innerText = wins;
        document.getElementById("currentWord").innerText = guessingWord.join("");
        document.getElementById("remainingGuesses").innerText = numGuess;
        document.getElementById("wordMeaning").innerText = meaning;
        document.getElementById("guessedLetters").innerText = guessedLetters.join(" ");
    };

    // Wait for key press
    document.onkeydown = function (event) {
        // Make sure key pressed is an alpha character
        if (isLetter(event.key) && pause === false) {
            checkForLetter(event.key.toUpperCase());
        }
        // Turn off blinking "...get started" message on keypress
        document.getElementById('welcome').className = 'noBlink';
    };

    // Check if key pressed is between A-Z or a-z
    var isLetter = function (ch) {
        return typeof ch === "string" && ch.length === 1
            && (ch >= "a" && ch <= "z" || ch >= "A" && ch <= "Z");
    };

    // Check if letter is in word
    function checkForLetter(letter) {
        var foundLetter = false;

        // Search string for letter
        for (var i = 0; i < wordToMatch.length; i++) {
            if (letter === wordToMatch[i]) {
                guessingWord[i] = letter
                foundLetter = true
                // If guessing word matches random word
                if (guessingWord.join("") === wordToMatch) {
                    // Increment # of wins and add word to usedGuessingWords
                    wins++
                    // Add word to usedGuessingWords array to not be repeated
                    usedGuessingwWords.push(wordToMatch)
                    console.log(usedGuessingwWords)
                    pause = true;

                    updateDisplay();
                    setTimeout(resetGame, 4000);
                }
            }
        }
        if (foundLetter === false) {
            // Check if inccorrect guess is already on the list
            if (guessedLetters.includes(letter) === false) {
                // Add incorrect letter to guessed letter list
                guessedLetters.push(letter)
                // Decrement the number of remaining guesses
                numGuess--
            }
            if (numGuess === 0) {
				var text = 'Sorry!! Correct word is ' + wordToMatch;
				document.getElementById("losing").innerText = text;
                // Add word to usedGuessingWords array to not be repeated
                usedGuessingwWords.push(wordToMatch);
                console.log(usedGuessingwWords)
                // Display word before reseting game
                guessingWord = wordToMatch.split();
                pause = true;

                setTimeout(resetGame, 4000);
            }
        }
        updateDisplay();
    };

    initializeGame();


</script>