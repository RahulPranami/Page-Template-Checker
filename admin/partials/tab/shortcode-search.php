<h3 class="text-xl font-bold pb-3 text-gray-300">Shortcode Usage Report</h3>

<form class="text-lg text-slate-300 p-2" hx-post="<?php echo admin_url('admin-ajax.php'); ?>" hx-vals='{"action": "search_shortcode"}' hx-trigger="submit" hx-target="#output">
    <div class="mb-4 flex items-center justify-between">
        <label for="searchQuery" class="">Search :</label>
        <input type="search" id="searchQuery" name="searchQuery" placeholder="Search Shortcode..." class="shadow appearance-none border rounded w-96 py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" required/>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Search
        </button>
    </div>
</form>

<div id="output">
    <span class="htmx-indicator">
        Searching...
    </span>
</div>
