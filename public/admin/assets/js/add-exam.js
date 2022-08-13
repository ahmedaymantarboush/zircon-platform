///////////////////text editor///////////////////
ClassicEditor.create(document.querySelector(".text-editor"), {
    language: {
        // The UI will be English.
        ui: "ar",

        // But the content will be edited in Arabic.
        content: "ar",
    },
})
    .then((editor) => {
        const wordCountPlugin = editor.plugins.get("WordCount");
        const wordCountWrapper = document.getElementById("word-count");

        wordCountWrapper.appendChild(wordCountPlugin.wordCountContainer);
        window.editor = editor;
    })
    .catch((err) => {});

