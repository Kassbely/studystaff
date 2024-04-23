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
//работа с главной страницей поиска
if (yaBtn !== undefined) {
  let i = 0;
  let timerId = setInterval(() => {
    yaInput.value += keyword[i];
    i++;
    if (i == keyword.length) {
      clearInterval(timerId);
      yaBtn.click();
    }
  },500)
  //Работа с результатами поисковой выдачи
  } else if (document.getElementsByClassName("HeaderDesktopNavigation-Cutted") !==null) {
    let nextPage = true;
    for (let i = 0; i < links.length; i++) {
      if (links[i].href.indexOf("ru.wikipedia.org") != -1) {
        let link = links[i];
        let nextPage = false;
        console.log("Нашел строку " + link);
        setTimeout(() => {
          link.click();
        }, getRandom(2000, 3000))
        break;
      }
    }
    if (document.querySelector('[aria-label="Страница 4"]').innerText == "4") {
      let nextPage = false;
      location.href = "https://ya.ru/"
    }
    if (nextPage) {
      setTimeout(() => {
        document.querySelector(".VanillaReact Pager-Item Pager-Item_type_next").click();
      }, getRandom(2500,3500))
    }
  }
function getRandom(min,max) {
  return Math.floor(Math.random() * (max - min) + min);
}

