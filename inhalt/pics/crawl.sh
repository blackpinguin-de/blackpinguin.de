#!/bin/bash

base="https://www.blackpinguin.de/include.php?s="

function fetch() {
  local name="$1"
  local fname="${name//+/ }"
  echo "$name"
  curl "$base$name" -o "$fname.html" &>/dev/null
  sed -i 's@src="/pic/@src="./pic/@g' "$fname.html"
}

for s in $(seq 1 2); do
  for i in $(seq 1 42); do
    fetch "pic&sub=$s&kategorie=Burgentour+2014&page=$i"
  done
  for i in $(seq 1 74); do
    fetch "pic&sub=$s&kategorie=USA+2011&page=$i"
  done
  for i in $(seq 1 53); do
    fetch "pic&sub=$s&kategorie=Berlin+2010&page=$i"
  done
  for i in $(seq 1 11); do
    fetch "pic&sub=$s&kategorie=Berlin+2009&page=$i"
  done
  for i in $(seq 1 3); do
    fetch "pic&sub=$s&kategorie=WoW+2009&page=$i"
  done
  for i in $(seq 1 116); do
    fetch "pic&sub=$s&kategorie=WoW+2008&page=$i"
  done
  for i in $(seq 1 77); do
    fetch "pic&sub=$s&kategorie=WoW+WotLK+Beta&page=$i"
  done
  for i in $(seq 1 110); do
    fetch "pic&sub=$s&kategorie=WoW+2007&page=$i"
  done
  for i in $(seq 1 30); do
    fetch "pic&sub=$s&kategorie=USA+2007&page=$i"
  done
  for i in $(seq 1 159); do
    fetch "pic&sub=$s&kategorie=WoW+2006&page=$i"
  done
  for i in $(seq 1 147); do
    fetch "pic&sub=$s&kategorie=WoW+2005&page=$i"
  done
  for i in $(seq 1 1); do
    fetch "pic&sub=$s&kategorie=Wallpapers&page=$i"
  done
done
