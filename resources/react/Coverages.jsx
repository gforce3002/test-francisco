import { noop } from 'lodash'
import React, {useCallback, useEffect, useState} from 'react'
import ReactDOM from 'react-dom'
import swal from 'sweetalert2'
import Alert from './utils/Alert'

const Coverages = (props) => {
    const [coverages, setCoverages] = useState([])
    const [page, setPage] = useState(1)
    const [pages, setPages] = useState([1])

    const removeCoverage = useCallback(async (id) => {
        try {
            await axios.delete(`/api/coverage/${id}`)
            location.reload()
        } catch (err) {
            Alert(err)
        }
    })

    const remove = (item) => {
        swal.fire({
            title: `¿Está seguro que desea eliminar esta cobertura?`,
            text: 'Esta acción no podrá deshacerse en el futuro',
            icon: 'warning',
            showCancelButton: true,
            reverseButtons: true,
            confirmButtonText: 'Eliminar',
            confirmButtonColor: '#d33',
            cancelButtonText: 'Cancelar'
        }).then((value) => {
            if (value.value === true) {
                removeCoverage(item.id).catch(noop)
            }
        })
    }

    const getCoverages = useCallback(async () => {
        try {
            const {data} = await axios.get('/api/coverage', {
                params: {
                    page
                }
            })

            setCoverages(data.results)
            setPages(data.pages)
        } catch (err) {
            Alert(err)
        }
    })

    useEffect(() => {
        getCoverages().catch(noop)
    }, [])

    return (
        <div className="content">
            <div className="card">
                <div className="card-body">
                    <div className="box-header with-border" style={{marginBottom: '15px'}}>
                        <div className="col-12 text-right">
                            <a href={'/coverages/create'} className='btn btn-success'>
                                <i className="fa fa-plus"></i> Registrar cobertura
                            </a>
                        </div>
                    </div>
                    <div className="box-body">
                        <div className="col-xs-12 pt-3">
                            <table className="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {coverages.map((item, key) => <tr key={key}>
                                        <td>{item.id}</td>
                                        <td>{item.name}</td>
                                        <td className="text-right">
                                            <a href={`/coverages/${item.id}`} className="btn btn-sm btn-secondary">
                                                Editar
                                            </a>
                                            <button type="button" className="btn btn-sm btn-danger ml-2" onClick={() => remove(item)}>
                                                <span className="fa fa-trash" /> Eliminar
                                            </button>
                                        </td>
                                    </tr>)}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    )
}

export default Coverages;

var element = document.getElementById('coverages-container')
if (element) {
    ReactDOM.render(<Coverages />, element)
}
