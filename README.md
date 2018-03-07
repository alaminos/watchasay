# watchasay
simple application for oral language comprehension training

# things to do
+ making the whole thing more OOP-ish?
+ maybe replace PHP by a hot language? just for the sake of it. Elixir, Rust... ? M-hmmm sexy sexy.
+ sentence audio should be played right after "next sentence" button is clicked and new sentence is loaded.
+ the user should get the audio BEFORE the words that will need ordering.
+ the user can reveal the words by clicking a button with the text "show words" for example.
+ the user can sort the words by drag and drop
+ the user can sort the words using the arrows in the keyboard (arrow down selects first word, arrow up deselect, arrow right move selector (if no word is selected) or move selected word (if a word is selected).
+ the selector is a small hand above the word.
+ the hand can be closed when selecting (grabbing) a word, or open when empty.
+ among the words, some words ARE NOT actally part of the sentence. Let's call these "false words".
+ The ratio of false words to true words needs to be defined.
+ An algorithm should pick the false words from a list of 5000 most frequent words in the target language.
+ This algorithm (let's call it false-word-picker) needs to be defined, but a possible criteria is, it should pick words that are morphologically similar to some of the true words.
 
 # about the audio
The files in the audio folder DO NOT belong to me. They are fragments extracted from a short movie, they should not be considered part of this repo and I'm only using them for testing purposes and only as a temporary resource. The movie can be watched here: https://www.youtube.com/watch?v=JtKqGa66CTM

# about the images
The images in the img folder DO NOT belong to me. I got them from a quick google search, only used them for quick prototyping of the app but they should be replaced soon by new images.
