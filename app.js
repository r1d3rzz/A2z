function Person(name, birth_year, gender) {
  this.name = name;
  this.birth_year = birth_year;
  this.gender = gender;
}

Person.prototype.info = function () {
  let age = new Date().getFullYear() - this.birth_year;
  return `My name is ${this.name}. I'm ${age} years old`;
};

function human(name, birth_year, gender) {
  Person.call(this, name, birth_year, gender);
}

human.prototype = Object.create(Person.prototype);

const aungaung = new human("Aung Aung", 2000, "male");

console.log(aungaung.info());
