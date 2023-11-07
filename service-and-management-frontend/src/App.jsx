import { Route, Routes, Navigate } from "react-router-dom";
import CustomerLandingPage from "./pages/Customer/customerLandingPage";
import PurchasedProducts from "./pages/Customer/purchasedProducts";
import RequestService from "./pages/Customer/requestService";
import ServiceStatus from "./pages/Customer/serviceStatus";
import Login from "./pages/Auth/login";
import ContactSupport from "./pages/Customer/contactSupport";
import TermsAndCondition from "./pages/Customer/termsAndCondition";
import FAQ from "./pages/Customer/faq";
import AboutUs from "./pages/Customer/aboutUs";
import EngineerLandingPage from "./pages/Engineer/engineerLandingPage";
// import ProductsCustomer from "./pages/Customer/products";
import HomePage from "./pages/HomePage/homePage";
import { getToken } from "./services/localStorageService";

function App() {
  const token = getToken();
  return (
    <>
      <Routes>
        <Route path="/" element={<Login />}></Route>
        <Route path="/customer/fd" element={<CustomerLandingPage />}></Route>
        <Route
          path="/customer/pursproducts"
          element={<PurchasedProducts />}
        ></Route>
        <Route
          path="/customer/reqservice/:productId"
          element={<RequestService />}
        ></Route>
        <Route
          path="/customer/servprogress"
          element={<ServiceStatus />}
        ></Route>
        <Route
          path="/customer/contsupport"
          element={<ContactSupport />}
        ></Route>
        {/* servhistory */}
        <Route
          path="/customer/termsandcondition"
          element={<TermsAndCondition />}
        ></Route>
        {/* <Route
          path="/customer/dashboard"
          element={<ProductsCustomer />}
        ></Route> */}
        <Route path="/customer/faq" element={<FAQ />}></Route>
        <Route path="/customer/aboutus" element={<AboutUs />}></Route>
        <Route path="/login" element={<Login />}></Route>
        <Route
          path="/engineer/dashboard"
          element={<EngineerLandingPage />}
        ></Route>
      </Routes>
    </>
  );
}

export default App;
