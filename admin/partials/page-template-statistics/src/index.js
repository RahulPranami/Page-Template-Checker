import { render } from "@wordpress/element";
import App from "./App";

import "./style.scss";

window.addEventListener(
    "load",
    function () {
        if (document.querySelector("#page-template-statistics")) {
            render(
                <App />,
                document.querySelector("#page-template-statistics")
            );
        }
    },
    false
);
