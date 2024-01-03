<span @class([
    "text-xs font-medium px-2.5 py-0.5 rounded",
    "bg-green-100 text-green-800" => $name === "active" || $name === "Available",
    "bg-gray-100 text-gray-800" => $name === "inactive",
    "bg-rose-100 text-rose-800" => $name === "Global Administrator" || $name === "Unavailable",
    "bg-sky-100 text-sky-800" => $name === "Administrator",
    "bg-purple-100 text-purple-800" => $name === "Timetable",
    "bg-blue-100 text-blue-800" => $name === "Teacher",
    "bg-cyan-100 text-cyan-800" => $name === "Report Card" || $name === "Graduation Card",
])
>
    {{ $name }}
</span>