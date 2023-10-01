import React from "react";
import TopNav from "../../../components/TopNavs/Customer/topnav";
import AdminSideNav from "../../../components/SideNavs/Admin/sidenav";
const ShowAllEngineer = () => {
  return (
    <div>
      <TopNav />
      <AdminSideNav />
      <div className="container-box">
        <div class="table w-full">
          <div class="table-header-group">
            <div class="table-row">
              <div class="table-cell text-left font-bold">Song</div>
              <div class="table-cell text-left font-bold">Artist</div>
              <div class="table-cell text-left font-bold">Year</div>
            </div>
          </div>
          <div class="table-row-group">
            <div class="table-row">
              <div class="table-cell">
                The Sliding Mr. Bones (Next Stop, Pottersville)
              </div>
              <div class="table-cell">Malcolm Lockyer</div>
              <div class="table-cell">1961</div>
            </div>
            <div class="table-row">
              <div class="table-cell">Witchy Woman</div>
              <div class="table-cell">The Eagles</div>
              <div class="table-cell">1972</div>
            </div>
            <div class="table-row">
              <div class="table-cell">Shining Star</div>
              <div class="table-cell">Earth, Wind, and Fire</div>
              <div class="table-cell">1975</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default ShowAllEngineer;
