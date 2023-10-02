import React from "react";
import TopNav from "../../components/TopNavs/Customer/topnav";
import AdminSideNav from "../../components/SideNavs/Admin/sidenav";

const OrderManage = () => {
  return (
    <div>
      <TopNav />
      <AdminSideNav />
      <div className="container-box">OrderManage</div>
    </div>
  );
};

export default OrderManage;
