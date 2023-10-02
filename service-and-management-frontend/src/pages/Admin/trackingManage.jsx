import React from "react";
import TopNav from "../../components/TopNavs/Customer/topnav";
import AdminSideNav from "../../components/SideNavs/Admin/sidenav";

const TrackingManage = () => {
  return (
    <div>
      <TopNav />
      <AdminSideNav />
      <div className="container-box">TrackingManage</div>
    </div>
  );
};

export default TrackingManage;
