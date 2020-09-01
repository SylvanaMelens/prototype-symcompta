import React, { useState } from "react";
import ReactDOM from "react-dom";
import {
  HashRouter,
  Route,
  Switch,
  withRouter,
  Redirect,
} from "react-router-dom";
// any CSS you import will output into a single css file (app.css in this case)
import "../css/app.css";
import Navbar from "./components/NavBar";
import CustomersPage from "./pages/CustomersPage";
import CustomerPage from "./pages/CustomerPage";
import InvoicesCustomerPage from "./pages/InvoicesCustomerPage";
import HomePage from "./pages/HomePage";
import ProvidersPage from "./pages/ProvidersPage";
import InvoicesProviderPage from "./pages/InvoicesProviderPage";
import LoginPage from "./pages/LoginPage";
import axiosAPI from "./services/axiosAPI";
import PrivateRoute from "./components/PrivateRoute";

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
// import $ from 'jquery';

axiosAPI.setup();

const App = () => {
  const [isAuthenticated, setIsAuthenticated] = useState(
    axiosAPI.isAuthenticated()
  );

  const NavbarWithRouter = withRouter(Navbar);

  return (
    <HashRouter>
      <NavbarWithRouter
        isAuthenticated={isAuthenticated}
        onLogout={setIsAuthenticated}
      />
      <main className="container pt-5">
        <Switch>
          <Route
            path="/login"
            render={(props) => (
              <LoginPage onLogin={setIsAuthenticated} {...props} />
            )}
          />
          <PrivateRoute
            path="/clients"
            component={CustomersPage}
            isAuthenticated={isAuthenticated}
          />
          <PrivateRoute
            path="/clients/:id"
            component={CustomerPage}
            isAuthenticated={isAuthenticated}
          />
          <PrivateRoute
            path="/factures-clients"
            component={InvoicesCustomerPage}
            isAuthenticated={isAuthenticated}
          />
          <PrivateRoute
            path="/fournisseurs"
            component={ProvidersPage}
            isAuthenticated={isAuthenticated}
          />
          <PrivateRoute
            path="/factures-fournisseurs"
            component={InvoicesProviderPage}
            isAuthenticated={isAuthenticated}
          />
          <Route path="/" component={HomePage} />
        </Switch>
      </main>
    </HashRouter>
  );
};

const rootElement = document.querySelector("#app");
ReactDOM.render(<App />, rootElement);
