// ==UserScript==
// @name Bot yandex
// @namespace http://tampermonkey.net/
// @version 1.00
// @description try to take over the world!
// @author Belyakova Alexandra
// @match https://ya.ru/*
// @grant none
// ==/UserScript==

let yaInput = document.getElementById("text");
let yaBtn = document.getElementsByClassName("search3__button mini-suggest__button")[0];
let links = document.links;
let keywords = ["Хорошие статьи", "Свободная энциклопедия", "Изображение дня"];
let keyword = keywords[getRandom(0, keywords.length)];

if (yaBtn !== undefined) {
    yaInput.value = keyword;
    yaBtn.click();
} else {
    for (let i = 0; i < links.length; i++) {
        if (links[i].href.indexOf("ru.wikipedia.org") != -1) {
            let link = links[i];
            console.log("Нашел строку " + link);
            link.click();
            break;
        }
    }
}

function getRandom(min,max) {
    return Math.floor(Math.random() * (max - min) + min);
}
