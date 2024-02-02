import { apiFetch } from "@wordpress/data-controls";

export function* getTemplates() {

    const items = yield apiFetch({
        path: "/wp/v2/posts",
        params: { meta_key: "_wp_page_template", per_page: -1 },
    });

    return items;
}

export default function App() {
    const pageTemplates = getTemplates();

    console.log(pageTemplates);

    return (
        <div>
            <span>Hello from JavaScript!</span>
        </div>
    );
}
