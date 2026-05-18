import { Head, Link } from '@inertiajs/react';

interface User {
    id: number;
    name: string;
    email: string;
    created_at: string;
}

interface Props {
    users: User[];
}

export default function UsersIndex({ users }: Props) {
    return (
        <>
            <Head title="Usuários" />
            <div className="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
                <div className="flex items-center justify-between">
                    <h1 className="text-2xl font-bold">Usuários</h1>
                </div>

                <div className="overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <table className="w-full text-sm">
                        <thead className="border-b border-sidebar-border/70 bg-sidebar/50 dark:border-sidebar-border">
                            <tr>
                                <th className="px-4 py-3 text-left font-medium text-muted-foreground">#</th>
                                <th className="px-4 py-3 text-left font-medium text-muted-foreground">Nome</th>
                                <th className="px-4 py-3 text-left font-medium text-muted-foreground">E-mail</th>
                                <th className="px-4 py-3 text-left font-medium text-muted-foreground">Criado em</th>
                                <th className="px-4 py-3 text-left font-medium text-muted-foreground">Ações</th>
                            </tr>
                        </thead>
                        <tbody className="divide-y divide-sidebar-border/70 dark:divide-sidebar-border">
                            {users.map((user) => (
                                <tr key={user.id} className="hover:bg-sidebar/30 transition-colors">
                                    <td className="px-4 py-3 text-muted-foreground">{user.id}</td>
                                    <td className="px-4 py-3 font-medium">{user.name}</td>
                                    <td className="px-4 py-3 text-muted-foreground">{user.email}</td>
                                    <td className="px-4 py-3 text-muted-foreground">
                                        {new Date(user.created_at).toLocaleDateString('pt-BR')}
                                    </td>
                                    <td className="px-4 py-3">
                                        <Link
                                            href={`/users/${user.id}`}
                                            className="text-primary underline-offset-4 hover:underline"
                                        >
                                            Ver detalhes
                                        </Link>
                                    </td>
                                </tr>
                            ))}

                            {users.length === 0 && (
                                <tr>
                                    <td colSpan={5} className="px-4 py-8 text-center text-muted-foreground">
                                        Nenhum usuário encontrado.
                                    </td>
                                </tr>
                            )}
                        </tbody>
                    </table>
                </div>
            </div>
        </>
    );
}

UsersIndex.layout = {
    breadcrumbs: [
        { title: 'Dashboard', href: '/dashboard' },
        { title: 'Usuários', href: '/users' },
    ],
};import { Head, Link } from '@inertiajs/react';

interface User {
    id: number;
    name: string;
    email: string;
    created_at: string;
}

interface Props {
    users: User[];
}

export default function UsersIndex({ users }: Props) {
    return (
        <>
            <Head title="Usuários" />
            <div className="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
                <div className="flex items-center justify-between">
                    <h1 className="text-2xl font-bold">Usuários</h1>
                </div>

                <div className="overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <table className="w-full text-sm">
                        <thead className="border-b border-sidebar-border/70 bg-sidebar/50 dark:border-sidebar-border">
                            <tr>
                                <th className="px-4 py-3 text-left font-medium text-muted-foreground">#</th>
                                <th className="px-4 py-3 text-left font-medium text-muted-foreground">Nome</th>
                                <th className="px-4 py-3 text-left font-medium text-muted-foreground">E-mail</th>
                                <th className="px-4 py-3 text-left font-medium text-muted-foreground">Criado em</th>
                                <th className="px-4 py-3 text-left font-medium text-muted-foreground">Ações</th>
                            </tr>
                        </thead>
                        <tbody className="divide-y divide-sidebar-border/70 dark:divide-sidebar-border">
                            {users.map((user) => (
                                <tr key={user.id} className="hover:bg-sidebar/30 transition-colors">
                                    <td className="px-4 py-3 text-muted-foreground">{user.id}</td>
                                    <td className="px-4 py-3 font-medium">{user.name}</td>
                                    <td className="px-4 py-3 text-muted-foreground">{user.email}</td>
                                    <td className="px-4 py-3 text-muted-foreground">
                                        {new Date(user.created_at).toLocaleDateString('pt-BR')}
                                    </td>
                                    <td className="px-4 py-3">
                                        <Link
                                            href={`/users/${user.id}`}
                                            className="text-primary underline-offset-4 hover:underline"
                                        >
                                            Ver detalhes
                                        </Link>
                                    </td>
                                </tr>
                            ))}

                            {users.length === 0 && (
                                <tr>
                                    <td colSpan={5} className="px-4 py-8 text-center text-muted-foreground">
                                        Nenhum usuário encontrado.
                                    </td>
                                </tr>
                            )}
                        </tbody>
                    </table>
                </div>
            </div>
        </>
    );
}

UsersIndex.layout = {
    breadcrumbs: [
        { title: 'Dashboard', href: '/dashboard' },
        { title: 'Usuários', href: '/users' },
    ],
};