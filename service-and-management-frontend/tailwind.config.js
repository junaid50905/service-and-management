/** @type {import('tailwindcss').Config} */
export default {
  content: ["./index.html", "./src/**/*.{js,ts,jsx,tsx}"],
  theme: {
    extend: {
      colors: {
        navColor: "#F65522", //#020553
        navBody: "#F4F4FE",
        topNavColor: "#F65522", //000559
        tableHeading: "#000559",
      },
      boxShadow: {
        customShadow: "0 4px 6px rgba(0, 0, 0, 0.1)",
      },
      scale: {
        '103': '1.01',
      }
    },
  },
  plugins: [],
};
