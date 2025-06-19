import { Redirect } from "react-router-dom";
import { getToken } from "../../Config/GeneralFunctions";
import { NotFound } from "../../Views/404";
import InMaintenance from "../../Views/InMaintenance";
import { HomePath, Paths } from "../paths.constants";
import { Views } from "../views.constants";
import Login from "../../Views/Auth/Login";
import Home from "../../Views/App/Home/Home";

const getRoute = (path, component, exact = true) => ({
  path,
  component,
  exact,
});

export const AuthRoutes = [
  getRoute(Paths[Views.login].path, Login),
];

export const AppRoutes = [
  getRoute(Paths[Views.home].path, Home),
];

export const OtherRoutes = [
  //Special Routes
  getRoute(Paths[Views.inMaintenance].path, InMaintenance),
  //Default route must be before from NotFound route
  getRoute(
    Paths[Views.default].path,
    () => {
      const token = getToken();
      if (token) return <Redirect to={HomePath.path} />;
      else return <Redirect to={Paths[Views.login].path} />;
    },
    true
  ),
  //NotFound Route must to be the last one
  getRoute(Paths[Views.notFound].path, NotFound, false),
];

