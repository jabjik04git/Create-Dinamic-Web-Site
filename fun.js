let newBook = new Book("War of the Worlds", "H G Wells");
console.log(newBook)












function Book(name, title) {
  this.name = name;
  this.title = title;
}
const cars = ["red","blue","black"];

for (const car in cars) {
  console.log(`This is the ${cars[car]} car`)
}
console.log("Hello World!")