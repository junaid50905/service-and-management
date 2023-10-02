import React from "react";
import TopNav from "../../../components/TopNavs/Customer/topnav";
import AdminSideNav from "../../../components/SideNavs/Admin/sidenav";

const ShowAllParts = () => {
  return (
    <div>
      <TopNav />
      <AdminSideNav />
      <div className="container-box">ShowAllParts</div>
    </div>
  );
};

export default ShowAllParts;
