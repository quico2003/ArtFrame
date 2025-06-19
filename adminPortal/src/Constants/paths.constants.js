import { Views } from "./views.constants";

const getPath = (path, title = null, icon = null) => ({
  path,
  title,
  icon,
});

export const Paths = {

  //#region General
  [Views.default]: getPath(`/`),
  [Views.notFound]: getPath("*"),
  [Views.inMaintenance]: getPath("/in-maintenance"),
  //#endregion

  //#region Auth
  [Views.login]: getPath(`/login`),
  //#endregion


  //#region Administrator
   [Views.home]: getPath(`/home`, "SideBarHome", "e88a"),

  // [Views.categories]: getPath(`/categories`, "SideBarCategories", "e574"),
  // [Views.new_category]: getPath(`/categories/new`),
  // [Views.edit_category]: getPath(`/categories/edit/:category_guid`),

  // [Views.products]: getPath(`/products`, "SideBarProducts", "f05b"),
  // [Views.new_product]: getPath(`/products/new`),
  // [Views.edit_product]: getPath(`/products/edit/:product_guid`),

  //#endregion

};

export const HomePath = Paths[Views.home];

export const replacePaths = (path, params, search = [], getObject = false) => {
  let newPath = path.path || path;
  let keys, key, value;
  params.map((obj) => {
    keys = Object.keys(obj);
    key = keys[0];
    value = obj[key];
    newPath = newPath.replace(`:${key}`, value);
  });

  if (search.length) newPath = `${newPath}?`;
  search.map((query) => {
    keys = Object.keys(query);
    key = keys[0];
    value = query[key];
    newPath = `${newPath}${key}=${value}&`;
  });

  if (getObject) {
    if (path.path) {
      path.path = newPath;
      return path;
    } else return newPath;
  }
  return newPath;
};
