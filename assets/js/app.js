import React from "react";
import ReactDOM from "react-dom";
import Navbar from "./components/NavBar"
import HomePage from "./pages/HomePage"
import CustomersPage from "./pages/CustomersPage";
import ProvidersPage from "./pages/ProvidersPage";
import { HashRouter, Switch, Route } from "react-router-dom"

// any CSS you import will output into a single css file (app.css in this case)
import "../css/app.css";

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
// import $ from 'jquery';

console.log("Hello Webpack Encore! Edit me in assets/js/app.js");

const App = () => {
  return <HashRouter> //affiche #/customers
    <Navbar />
    <main className="container pt-5">
        <Switch>
          <Route path="/clients" component={CustomersPage}/>
          <Route path="/fournisseurs" component={ProvidersPage}/>
          <Route path="/" component={HomePage}/>
          
        </Switch>

    </main>
  </HashRouter>;
};

const rootElement = document.querySelector("#app");
ReactDOM.render(<App />, rootElement);
