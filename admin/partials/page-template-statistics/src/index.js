import { render } from "@wordpress/element";

import "./style.scss";

function MyFirstApp() {
    return <span>Hello from JavaScript!</span>;
}

window.addEventListener(
    "load",
    function () {
        if (document.querySelector("#page-template-statistics")) {
            render(
                <MyFirstApp />,
                document.querySelector("#page-template-statistics")
            );
        }
    },
    false
);
