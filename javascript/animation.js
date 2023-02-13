window.onload = function() {

    text = document.getElementsByClassName("head_desc")[0];
    if(text) {
        message = "Développeur fraîchement diplômé, j’ai décidé d'intégrer la formation d’OpenClassrooms (Développeur web) dès la sortie du lycée afin de réaliser mon objectif.\nJ’ai donc maintenant des connaissances sur plusieurs technologies telles que Html, Css, Javascript ou encore NodeJS. Au niveau de la gestion de projet je me suis familiarisé avec l’outil Git.\n\nJe suis actuellement à la recherche d’un poste de développeur front-end/React afin de me perfectionner et d’apprendre de nouvelles technologies.";
        index = 0;
        cursor = '|';
        let cursorInterval;

        function writeText() {
            text.innerHTML = message.substring(0, index);
            index++;
            if (index === message.length + 1) {
                clearInterval(cursorInterval);
            } else {
                setTimeout(writeText, 20);
            }
        }

        cursorInterval = setInterval(function() {
            blinkCursor();
        }, 200);

        function blinkCursor() {
            text.innerHTML += cursor;
            if (cursor === "|") {
                cursor = "";
            } else {
                cursor = "|";
            }
        }
        writeText();
    }
};
