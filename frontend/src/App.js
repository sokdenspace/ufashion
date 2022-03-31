import "./App.css";
import React from "react";
import logo from "../src/images/logo.png";

console.log(logo); // /logo.84287d09.png

function App() {
  return (
    <div class="containers">
      <div class="navbar">
        <ul>
          <a href="http://localhost:3000/">
            <img src={logo} alt="Logo" />
          </a>
          <li>
            <a href="#Home">Home</a>
          </li>
          <li>
            <a href="#About">About</a>
          </li>
          <li>
            <a href="#Cart">Cart</a>
          </li>
          <li>
            <a href="#Profile">Profile</a>
          </li>
          <li>
            <a href="#Contact">Contact</a>
          </li>
          <input type="text" placeholder="search"></input>
        </ul>
      </div>

      <div class="contents">
        <div class="grid-container">
          <div class="grid-item"><img src={logo} alt="Logo" /></div>
          <div class="grid-item"><img src={logo} alt="Logo" /></div>
          <div class="grid-item"><img src={logo} alt="Logo" /></div>
          <div class="grid-item"><img src={logo} alt="Logo" /></div>
          <div class="grid-item"><img src={logo} alt="Logo" /></div>
          <div class="grid-item"><img src={logo} alt="Logo" /></div>
          <div class="grid-item"><img src={logo} alt="Logo" /></div>
          <div class="grid-item"><img src={logo} alt="Logo" /></div>
          <div class="grid-item"><img src={logo} alt="Logo" /></div>
          <div class="grid-item"><img src={logo} alt="Logo" /></div>
          <div class="grid-item"><img src={logo} alt="Logo" /></div>
          <div class="grid-item"><img src={logo} alt="Logo" /></div>
        </div>
      </div>
    </div>
  );
}
export default App;
