import { Configuration } from "../Config/app.config";

const BASE_URL_ADMIN = `${Configuration.API_URL}/api/admin`;

export const EndpointsAdmin = {
  Auth: {
    login: `${BASE_URL_ADMIN}/login`,
   
  },

  Categories: {
    // getAll: `${BASE_URL_ADMIN}/category/getAll`,
    // getList: `${BASE_URL_ADMIN}/category/getList`,
    // get: `${BASE_URL_ADMIN}/category/get`,
    // create: `${BASE_URL_ADMIN}/category/create`,
    // update: `${BASE_URL_ADMIN}/category/update`,
    // delete: `${BASE_URL_ADMIN}/category/delete`,
  },

  Products: {
    // getAll: `${BASE_URL_ADMIN}/product/getAll`,
    // get: `${BASE_URL_ADMIN}/product/get`,
    // getForUpdate: `${BASE_URL_ADMIN}/product/getForUpdate`,
    // create: `${BASE_URL_ADMIN}/product/create`,
    // update: `${BASE_URL_ADMIN}/product/update`,
    // delete: `${BASE_URL_ADMIN}/product/delete`,
    // getAllWithoutCategory: `${BASE_URL_ADMIN}/product/getAllWithoutCategory`,
    // assignCategory: `${BASE_URL_ADMIN}/product/assignCategory`
  },

  Dashboard: {
    // countProductsForCategory: `${BASE_URL_ADMIN}/dashboard/countProductsForCategory`,
    // countClientsForUsers: `${BASE_URL_ADMIN}/dashboard/countClientsForUsers`,
    // typeCount: `${BASE_URL_ADMIN}/dashboard/typeCount`,
    // getAllWithoutUser: `${BASE_URL_ADMIN}/dashboard/getAllWithoutUser`,
    // deleteClient: `${BASE_URL_ADMIN}/dashboard/deleteClient`,
    // getUsers: `${BASE_URL_ADMIN}/dashboard/getUsers`,
    // assignNewUser: `${BASE_URL_ADMIN}/dashboard/assignNewUser`,
  }
};


export const getEndpoint = (path, params = null, isCustom = false) => {
  let url = `${path}.php`;
  if (isCustom) url = path;

  if (params) {
    params.map((param) => {
      url = `${url}/${param}`;
    });
  }

  return url;
};
