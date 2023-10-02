import React from "react";
import CustomerSideNav from "../../components/SideNavs/Customer/customerSideNav";
import TopNav from "../../components/TopNavs/Customer/topnav";
import GeoLocation from "../../components/GeoLocation/useGeoLocation";

const CustomerLandingPage = () => {
  return (
    <div>
      <TopNav />
      <CustomerSideNav />
      <div className="container-box">
        <GeoLocation />
      </div>
    </div>
  );
};

export default CustomerLandingPage;
