class Animal {
  constructor(name) {
    this.name = name;
  }

  eat() {
    return `${this.name} is eating`;
  }

  sleep() {
    return `${this.name} is sleep`;
  }
}

class Dog extends Animal {
  info() {
    return `${this.name} is a dangerous dog.`;
  }
}

const aungnet = new Dog("Aung Net");

console.log(aungnet);
