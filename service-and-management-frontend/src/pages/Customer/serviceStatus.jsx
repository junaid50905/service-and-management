import React, { useState } from "react";
import CustomerSideNav from "../../components/SideNavs/Customer/customerSideNav";
import TopNav from "../../components/TopNavs/Customer/topnav";
import ReactModal from "react-modal";
import Late from "../../assets/images/late.png";
import Pending from "../../assets/images/pending.png";
import Finished from "../../assets/images/finished.png";
import { FaWindowClose } from "react-icons/fa";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import {
  faClock,
  faWrench,
  faCircleCheck,
} from "@fortawesome/free-solid-svg-icons";

const ServiceStatus = () => {
  const products = [
    {
      id: 1,
      serialNumber: "SN12345",
      name: "Laptop",
      model: "X1",
      manufacturer: "TechCorp",
      status: "Pending",
      partsUsed: "None",
      delayReason: "",
      maintenanceType: "Scheduled Maintenance",
      maintenanceNotes: "Routine cleaning and software update.",
      maintenancePersonnel: "Alice Johnson",
      maintenancePersonnelPhoto: "alice.jpg",
      maintenancePersonnelCont: "01743217209",
      branchName: "DHAKA Branch",
    },
    {
      id: 2,
      serialNumber: "SN67890",
      name: "Smartphone",
      model: "S2",
      manufacturer: "MobileTech",
      status: "Finished",
      partsUsed: "Screen replacement, battery upgrade",
      delayReason: "",
      maintenanceType: "Repair",
      maintenanceNotes: "Repaired screen and upgraded battery.",
      maintenancePersonnel: "Bob Smith",
      maintenancePersonnelPhoto: "bob.jpg",
      maintenancePersonnelCont: "01743217209",
      branchName: "SYLHET Branch",
    },
    {
      id: 3,
      serialNumber: "SN54321",
      name: "Refrigerator",
      model: "FridgeMaster",
      manufacturer: "CoolTech",
      status: "Late",
      partsUsed: "Compressor replacement",
      delayReason: "Supplier delay",
      maintenanceType: "Emergency Repair",
      maintenanceNotes: "Replaced compressor due to failure.",
      maintenancePersonnel: "Elena Rodriguez",
      maintenancePersonnelPhoto: "elena.jpg",
      maintenancePersonnelCont: "01743217209",
      branchName: "DHAKA Branch",
    },
    {
      id: 4,
      serialNumber: "SN98765",
      name: "Digital Camera",
      model: "SnapShot",
      manufacturer: "PhotoGear",
      status: "Finished",
      partsUsed: "Lens cleaning, firmware update",
      delayReason: "",
      maintenanceType: "Routine Maintenance",
      maintenanceNotes: "Cleaned the lens and updated firmware.",
      maintenancePersonnel: "David Brown",
      maintenancePersonnelPhoto: "david.jpg",
      maintenancePersonnelCont: "01743217209",
      branchName: "DHAKA Branch",
    },
    {
      id: 5,
      serialNumber: "SN24680",
      name: "Coffee Maker",
      model: "BrewMaster",
      manufacturer: "CafeTech",
      status: "Late",
      partsUsed: "Heating element replacement",
      delayReason: "Supplier delay",
      maintenanceType: "Emergency Repair",
      maintenanceNotes: "Replaced heating element due to malfunction.",
      maintenancePersonnel: "Grace Taylor",
      maintenancePersonnelPhoto: "grace.jpg",
      maintenancePersonnelCont: "01743217209",
      branchName: "SYLHET Branch",
    },
    {
      id: 6,
      serialNumber: "SN13579",
      name: "Television",
      model: "UltraView",
      manufacturer: "VisionTech",
      status: "Pending",
      partsUsed: "None",
      delayReason: "",
      maintenanceType: "Installation",
      maintenanceNotes: "Installed and configured the TV set.",
      maintenancePersonnel: "James Wilson",
      maintenancePersonnelPhoto: "james.jpg",
      maintenancePersonnelCont: "01743217209",
      branchName: "DHAKA Branch",
    },
    {
      id: 7,
      serialNumber: "SN11223",
      name: "Washing Machine",
      model: "CleanWash",
      manufacturer: "LaundryTech",
      status: "Late",
      partsUsed: "Pump replacement",
      delayReason: "Supplier delay",
      maintenanceType: "Emergency Repair",
      maintenanceNotes: "Replaced the pump due to a malfunction.",
      maintenancePersonnel: "Olivia Martinez",
      maintenancePersonnelPhoto: "olivia.jpg",
      maintenancePersonnelCont: "01743217209",
      branchName: "DHAKA Branch",
    },
    {
      id: 8,
      serialNumber: "SN87654",
      name: "Microwave Oven",
      model: "HeatWave",
      manufacturer: "KitchenTech",
      status: "Finished",
      partsUsed: "Magnetron replacement, door latch repair",
      delayReason: "",
      maintenanceType: "Repair",
      maintenanceNotes: "Replaced magnetron and repaired the door latch.",
      maintenancePersonnel: "William Lee",
      maintenancePersonnelPhoto: "william.jpg",
      maintenancePersonnelCont: "01743217209",
      branchName: "DHAKA Branch",
    },
    {
      id: 9,
      serialNumber: "SN45678",
      name: "Air Conditioner",
      model: "CoolBreeze",
      manufacturer: "ClimateTech",
      status: "Pending",
      partsUsed: "None",
      delayReason: "",
      maintenanceType: "Scheduled Maintenance",
      maintenanceNotes: "Cleaned filters and checked refrigerant levels.",
      maintenancePersonnel: "Sophia Chen",
      maintenancePersonnelPhoto: "sophia.jpg",
      maintenancePersonnelCont: "01743217209",
      branchName: "DHAKA Branch",
    },
    {
      id: 10,
      serialNumber: "SN10101",
      name: "Tablet",
      model: "TabPro",
      manufacturer: "TechGadget",
      status: "Finished",
      partsUsed: "Battery replacement, screen repair",
      delayReason: "",
      maintenanceType: "Repair",
      maintenanceNotes: "Replaced the battery and repaired the screen.",
      maintenancePersonnel: "Michael Adams",
      maintenancePersonnelPhoto: "michael.jpg",
      maintenancePersonnelCont: "01743217209",
      branchName: "DHAKA Branch",
    },
  ];

  products.sort((a, b) => {
    if (a.status === "Late" && b.status !== "Late") {
      return -1;
    }
    if (a.status !== "Late" && b.status === "Late") {
      return 1;
    }
    if (a.status === "Pending" && b.status === "Finished") {
      return -1;
    }
    if (a.status === "Finished" && b.status === "Pending") {
      return 1;
    }
    return 0;
  });

  const [selectedProduct, setSelectedProduct] = useState(null);
  const [modalIsOpen, setModalIsOpen] = useState(false);

  const openModal = (product) => {
    setSelectedProduct(product);
    setModalIsOpen(true);
  };

  const closeModal = () => {
    setSelectedProduct(null);
    setModalIsOpen(false);
  };

  const lateProducts = products.filter((product) => product.status === "Late");
  const pendingProducts = products.filter(
    (product) => product.status === "Pending"
  );
  const finishedProducts = products.filter(
    (product) => product.status === "Finished"
  );

  const lateCount = lateProducts.length;
  const pendingCount = pendingProducts.length;
  const finishedCount = finishedProducts.length;

  const totalCount = lateCount + pendingCount + finishedCount;

  return (
    <div>
      <TopNav />
      <CustomerSideNav />
      <div className="mx-auto container-box font-roboto">
        <h1 className="mt-2 text-3xl font-bold text-center text-gray-800">
          Service Maintenance Status
        </h1>
        <div className="fixed bottom-0 z-30 flex gap-4 px-4 py-2 text-xl font-bold text-gray-800 bg-[#f7f7f7] right-2">
          <div className="flex items-center gap-2">
            <div className="w-4 h-4 bg-red-500"></div>
            <div>
              <p>Late - {lateCount}</p>
            </div>
          </div>
          <div className="flex items-center gap-2">
            <div className="w-4 h-4 bg-blue-500"></div>
            <div>
              <p>Pending - {pendingCount}</p>
            </div>
          </div>
          <div className="flex items-center gap-2">
            <div className="w-4 h-4 bg-green-500"></div>
            <div>
              <p>Finished - {finishedCount}</p>
            </div>
          </div>
          <div className="flex items-center gap-2">
            <div className="w-4 h-4 bg-gray-800"></div>
            <div>
              <p>Total - {totalCount}</p>
            </div>
          </div>
        </div>
        <div className="relative grid grid-cols-1 gap-4 z-20 p-4 mt-4 text-[#212529] rounded-md md:grid-cols-1 xl:grid-cols-4 ">
          {products.map((product) => (
            <div
              key={product.id}
              className="transition duration-300 ease-in-out border rounded-lg shadow-md popup hover:scale-105 hover:shadow-lg"
              onClick={() => openModal(product)}
            >
              <div className="z-40">
                <span className=" popuptext">{product.maintenanceNotes}</span>
              </div>
              <div className="flex h-full">
                <div
                  className={`w-1/3 rounded-l-lg text-white ${getStatusColorClass(
                    product.status
                  )}`}
                >
                  <div className="flex flex-col items-center justify-center h-full gap-1 p-1">
                    <div className="text-xl">
                      {product.status === "Late" && (
                        <FontAwesomeIcon icon={faClock} />
                      )}
                      {product.status === "Pending" && (
                        <FontAwesomeIcon icon={faWrench} />
                      )}
                      {product.status === "Finished" && (
                        <FontAwesomeIcon icon={faCircleCheck} />
                      )}
                    </div>
                    <div>{product.status}</div>
                  </div>
                </div>
                <div className="flex flex-col  w-2/3  p-3 py-1.5">
                  <div className="font-bold">{product.name}</div>
                  <div className="text-sm font-medium">{product.model}</div>
                  <div className="text-xs">{product.branchName}</div>
                </div>
              </div>
            </div>
          ))}
        </div>
      </div>
      <div>
        <ReactModal
          isOpen={modalIsOpen}
          onRequestClose={closeModal}
          contentLabel="Product Details Modal"
          overlayClassName="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center px-4"
          className="absolute w-2/5 bg-white outline-none rounded-xl"
        >
          <button
            className="absolute text-2xl text-white cursor-pointer top-2 right-2"
            onClick={closeModal}
          >
            <FaWindowClose />
          </button>
          {selectedProduct && (
            <div className="rounded-md font-roboto">
              <div>
                <div
                  className={`w-full rounded-t-md text-white ${getStatusColorClass(
                    selectedProduct.status
                  )}`}
                >
                  <div className="flex items-center justify-around h-full gap-2 p-4 ">
                    <div className="flex items-center gap-4">
                      <div className="text-2xl">
                        {selectedProduct.status === "Late" && (
                          <FontAwesomeIcon icon={faClock} />
                        )}
                        {selectedProduct.status === "Pending" && (
                          <FontAwesomeIcon icon={faWrench} />
                        )}
                        {selectedProduct.status === "Finished" && (
                          <FontAwesomeIcon icon={faCircleCheck} />
                        )}
                      </div>
                      <div className="text-2xl font-semibold">
                        {selectedProduct.status}
                      </div>
                    </div>

                    {selectedProduct.status === "Late" && (
                      <p className="text-lg">
                        Reason for Delay: {selectedProduct.delayReason}
                      </p>
                    )}
                  </div>
                </div>
                <div className="p-4 px-8 text-lg rounded-b-md">
                  <h2 className="mb-2 text-2xl font-extrabold text-center text-red-500">
                    {selectedProduct.maintenanceType}
                  </h2>
                  <h2 className="text-xl font-bold">
                    {selectedProduct.name} - {selectedProduct.model}
                  </h2>
                  <h4>
                    <span>Manufacturer: </span>
                    {selectedProduct.manufacturer}
                  </h4>
                  <h4>
                    <span>Serial Number: </span>
                    {selectedProduct.serialNumber}
                  </h4>
                  <h4>
                    <span>Branch Name: </span>
                    {selectedProduct.branchName}
                  </h4>
                  <div>
                    <p>
                      <span className="font-semibold">Parts Used: </span>
                      {selectedProduct.partsUsed}
                    </p>
                    <p>
                      <span className="font-semibold">Maintenance Notes: </span>
                      {selectedProduct.maintenanceNotes}
                    </p>
                  </div>
                </div>
                <div className="flex w-full px-8 mb-8">
                  <div>
                    <img
                      src="https://i.postimg.cc/Jz4r8xz5/User-Avatar-Profile-PNG.png"
                      alt={selectedProduct.maintenancePersonnel}
                      className="w-24 h-24 bg-gray-800 rounded-md shadow-md shadow-gray-500"
                    />
                  </div>
                  <div className="flex flex-col justify-center ml-4">
                    <p className="mb-1 font-semibold text-green-800">
                      Maintenance Personnel
                    </p>
                    <p>
                      <span className="font-semibold">Name: </span>
                      {selectedProduct.maintenancePersonnel}
                    </p>
                    <p>
                      <span className="font-semibold">Contact No: </span>
                      {selectedProduct.maintenancePersonnelCont}
                    </p>
                  </div>
                </div>
              </div>
            </div>
          )}
        </ReactModal>
      </div>
    </div>
  );
};

function getStatusColorClass(status) {
  switch (status) {
    case "Pending":
      return "bg-blue-500";
    case "Late":
      return "bg-red-500";
    case "Finished":
      return "bg-green-500";
    default:
      return "bg-gray-500";
  }
}

export default ServiceStatus;
