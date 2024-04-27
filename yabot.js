// ==UserScript==
// @name         yandex bot
// @namespace    http://tampermonkey.net/
// @version      1.00
// @description  Bot for yandex
// @author       Belyakova Alexandra
// @match        https://ya.ru/*
// @match        https://htmlbook.ru/*
// @match        https://learn.javascript.ru/*
// @match        https://your-tailor.ru/*
// @grant        none
// ==/UserScript==

let yaInput = document.getElementsByName('text')[0];
let yaBtn = document.getElementsByClassName("search3__button mini-suggest__button")[0];
let links = document.links;
let sites = {
  "htmlbook.ru": ["CSS-анимация для начинающих", "Справочник по HTML"],
  "learn.javascript.ru": ["Современный учебник JavaScript", "DOM", "Массивы"],
  "your-tailor.ru": ["выкройка майка алкоголичка", "видеоуроки по пошиву", "магазин выкроек"],
}
let sitesKeys = Object.keys(sites);
let site = sitesKeys[getRandom(0, sitesKeys.length)];
let keywords = sites[site];
let keyword = keywords[getRandom(0, keywords.length)];

let mouseClick = new MouseEvent("click");

//Работаем на главной странице
let i = 0;
if (yaBtn !== undefined) {
  document.cookie = `site=${site}`; // первый site это название куки
} else if (location.hostname == "ya.ru") {
  site = getCookie("site"); // первый site это название куки
} else {
  site = location.hostname;
}
if (yaBtn !== undefined) {
  //  yaInput.focus();
  //  yaInput.dispatchEvent(mouseClick);
  //  yaInput.value = keyword;
  //   yaBtn.click();
  document.cookie = `site = ${site}`;
  let timerId = setInterval(() => {
    yaInput.value += keyword[i];
    i++;
    if (i == keyword.length) {
      clearInterval(timerId);
      yaBtn.click();
    }
  },150)
  //Работаем на целевом сайте
  } else if (location.hostname == site) {

    setInterval(() => {
      let index = getRandom(0, links.length);

      if (getRandom(0, 101) >= 80) {
        location.href = "https://ya.ru/";
    } else if (links[index].href.indexOf(site) !== -1) {
      links[index].click();
    }
  }, getRandom(2500, 4500));
    console.log("Мы на целевом сайте");
}
//Работаем на странице поисковой выдачи
else if (document.querySelector(".Pager-Content") !== null){
  let nextPage = true;
  for (let i = 0; i < links.length; i++) {
    if (links[i].href.indexOf(site) != -1) {
      let link = links[i];
      let nextPage = false;
      console.log("Нашел строку " + link);
      setTimeout(() => {
        //link.target = '_self';
        link.click();
      }, getRandom(2000, 3000));
      break;
    }
  }
  let elementExist = setInterval(() => {
    let elem = document.querySelector('a[aria-label="Первая страница"]');
    if (elem !== null ) {
      if (elem.innerText == "5") {
        let nextPage = false;
        location.href = "https://ya.ru/";
      }
      clearInterval(elementExist);
    }
  }, 100)


  if (nextPage) {
    setTimeout(() => {
      document.querySelector('a[aria-label="Следующая страница"]').click();
    }, getRandom(2500, 3500))

  }
}

function getRandom(min,max) {
  return Math.floor(Math.random() * (max - min) + min);
}

function getCookie(name) {
  let matches = document.cookie.match(new RegExp(
    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  ));
  return matches ? decodeURIComponent(matches[1]) : undefined;
}
//this.link.forEach(link => link.removeAttribute('target'));

//(function() {
//   'use strict'; Array.from(document.querySelectorAll('a[target="_blank"]'))
//   .forEach(link => link.removeAttribute('target'));})();
