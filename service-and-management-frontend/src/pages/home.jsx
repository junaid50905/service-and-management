import React from "react";
import SideNav from "../components/sidenav";
import TopNav from "../components/topnav";

const Home = () => {
  return (
    <div className="flex">
      <TopNav />
      <SideNav />
      <div className="container mx-auto bg-white">Home</div>
    </div>
  );
};

export default Home;
