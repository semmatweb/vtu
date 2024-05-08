const container = document.querySelector(".container")
const coffees = [
  { name: "Perspiciatis", image: "images/freesub_1.jpeg" },
  { name: "Voluptatem", image: "images/freesub_1.jpeg" },
  { name: "Explicabo", image: "images/freesub_1.jpeg" },
  { name: "Rchitecto", image: "images/freesub_1.jpeg" },
  { name: " Beatae", image: "images/freesub_1.jpeg" },
  { name: " Vitae", image: "images/freesub_1.jpeg" },
  { name: "Inventore", image: "images/freesub_1.jpeg" },
  { name: "Veritatis", image: "images/freesub_1.jpeg" },
  { name: "Accusantium", image: "images/freesub_1.jpeg" },
]
const showCoffees = () => {
    let output = ""
    coffees.forEach(
      ({ name, image }) =>
        (output += `
                <div class="card">
                  <img class="card--avatar" src=${image} />
                  <h1 class="card--title">${name}</h1>
                  <a class="card--link" href="#">Taste</a>
                </div>
                `)
    )
    container.innerHTML = output
  }
  
  document.addEventListener("DOMContentLoaded", showCoffees)

  if ("serviceWorker" in navigator) {
    window.addEventListener("load", function() {
      navigator.serviceWorker
        .register("/serviceWorker.js")
        .then(res => console.log("service worker registered"))
        .catch(err => console.log("service worker not registered", err))
    })
  }