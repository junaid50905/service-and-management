import { Route, Routes } from "react-router-dom";
import AdminLandingPage from "./pages/Admin/adminLandingPage";
import OrderManage from "./pages/Admin/orderManage";
import TrackingManage from "./pages/Admin/trackingManage";
import AddParts from "./pages/Admin/ManageParts/addParts";
import ShowAllParts from "./pages/Admin/ManageParts/showAllParts";
import AddEngineer from "./pages/Admin/ManageEngineers/addEngineer";
import ShowAllEngineer from "./pages/Admin/ManageEngineers/showAllEngineers";
import CustomerLandingPage from "./pages/Customer/customerLandingPage";
import PurchasedProducts from "./pages/Customer/purchasedProducts";
import RequestService from "./pages/Customer/requestService";
import ServiceStatus from "./pages/Customer/serviceStatus";
import Login from "./pages/Login/login";

function App() {
  return (
    <>
      <Routes>
        <Route path="/dashboard" element={<AdminLandingPage />}></Route>
        <Route path="/" element={<AdminLandingPage />}></Route>
        <Route path="/ManageOrder" element={<OrderManage />}></Route>
        <Route path="/newPart" element={<AddParts />}></Route>
        <Route path="/showParts" element={<ShowAllParts />}></Route>
        <Route path="/newEngineer" element={<AddEngineer />}></Route>
        <Route path="/showEngineers" element={<ShowAllEngineer />}></Route>
        <Route path="/TrackManage" element={<TrackingManage />}></Route>
        <Route
          path="/customer/dashboard"
          element={<CustomerLandingPage />}
        ></Route>
        <Route
          path="/customer/PurchasedProducts"
          element={<PurchasedProducts />}
        ></Route>
        <Route
          path="/customer/reqservice/:productId"
          element={<RequestService />}
        ></Route>
        <Route
          path="/customer/servicestatus"
          element={<ServiceStatus />}
        ></Route>
        <Route path="/login" element={<Login />}></Route>
      </Routes>
    </>
  );
}

export default App;
