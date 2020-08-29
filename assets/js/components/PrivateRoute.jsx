import React from "react";
import { Route, Redirect } from "react-router-dom";

const PrivateRoute = ({ path, isAuthenticated, component }) =>
  isAuthenticated ? (
    <Route path={path} component={component} />
  ) : (
    <Redirect to="/login" />
  );

export default PrivateRoute;
