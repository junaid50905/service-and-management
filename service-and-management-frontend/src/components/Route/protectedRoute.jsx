import { Route, Navigate } from "react-router-dom";
import { getToken } from "../../services/localStorageService";

function PrivateRoute({ element: Element, ...props }) {
  const token = getToken(); // Assuming this function gets the token from your service

  return token ? <Element {...props} /> : <Navigate to="/login" replace />;
}

export default PrivateRoute;
