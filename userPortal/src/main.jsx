import ReactDOM from "react-dom/client.js";
import { Provider } from "react-redux";
import { BrowserRouter } from "react-router-dom";
import App from "./App.jsx";
import "./Assets/styles/styles.scss";
import { Configuration } from "./Config/app.config.js";
import store from "./Redux/store.js";

ReactDOM.createRoot(document.getElementById("root")).render(
  <BrowserRouter basename={Configuration.BASE_PATH}>
    <Provider store={store}>
      <App />
    </Provider>
  </BrowserRouter>
);
