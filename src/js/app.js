require("./bootstrap");

// Uri segment array
const uriSegment = window.location.pathname.split("/");

if (uriSegment[1] === "aff-check") {
	require("./affcheck");
}
if (uriSegment[1] === "users") {
	require("./users");
}