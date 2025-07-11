import PageBreadcrumb from "../../components/common/PageBreadCrumb.jsx";
import PageMeta from "../../components/common/PageMeta.jsx";
import CrudPage from "../../components/shared/CrudPage.jsx";
import ComponentCard from "../../components/common/ComponentCard.jsx";
import {useDeleteVideoMutation, useVideoQuery} from "../../redux/video/videoApiSlice.js";

export default function VideoPage() {
    const gridHeaderRow = [
        {name: 'id', label: '#', sortable: true},
        {name: 'title', label: 'Назва', sortable: true},
        {name: 'user', label: 'Автор'},
        {name: 'created_at', label: 'Дата створення'},
        {name: 'updated_at', label: 'Дата модифікації'}
    ];

    return (
        <>
            <PageMeta
                title="User page"
                description="User page"
            />
            <PageBreadcrumb
                breadcrumbs={[
                    { title: "Home", to: "/admin/dashboard" },
                    { title: "Videos" },
                ]}
            />
            <div className="space-y-6">
                <ComponentCard title="Videos">
                    <CrudPage
                        buttonTitle="Video"
                        createPath="/admin/videos/create"
                        editPath="/admin/videos"
                        gridHeaderRow={gridHeaderRow}
                        useQuery={useVideoQuery}
                        useDeleteMutation={useDeleteVideoMutation}
                        isFilter={true}
                        isSearch={true}
                    />
                </ComponentCard>
            </div>
        </>
    );
}
