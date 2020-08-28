import React, { useState } from "react";
import ReactDOM from "react-dom";
import { HashRouter, Route, Switch } from "react-router-dom";
// any CSS you import will output into a single css file (app.css in this case)
import "../css/app.css";
import Navbar from "./components/NavBar";
import CustomersPage from "./pages/CustomersPage";
import InvoicesCustomerPage from "./pages/InvoicesCustomerPage";
import HomePage from "./pages/HomePage";
import ProvidersPage from "./pages/ProvidersPage";
import InvoicesProviderPage from "./pages/InvoicesProviderPage";
import LoginPage from "./pages/LoginPage";
import axiosAPI from "./services/axiosAPI";

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
// import $ from 'jquery';

axiosAPI.setup();

const App = () => {
  const [isAuthenticated, setIsAuthenticated] = useState(
    axiosAPI.isAuthenticated()
  );

  return (
    <HashRouter>
      <Navbar isAuthenticated={isAuthenticated} onLogout={setIsAuthenticated} />
      <main className="container pt-5">
        <Switch>
          <Route
            path="/login"
            render={(props) => <LoginPage onLogin={setIsAuthenticated} />}
          />
          <Route path="/clients" component={CustomersPage} />
          <Route path="/factures-clients" component={InvoicesCustomerPage} />
          <Route path="/fournisseurs" component={ProvidersPage} />
          <Route
            path="/factures-fournisseurs"
            component={InvoicesProviderPage}
          />
          <Route path="/" component={HomePage} />
        </Switch>
      </main>
    </HashRouter>
  );
};

const rootElement = document.querySelector("#app");
ReactDOM.render(<App />, rootElement);
