import { noop } from 'lodash'
import React, {useState, useCallback, useEffect} from 'react'
import ReactDOM from 'react-dom'
import swal from 'sweetalert2'
import Alert from './utils/Alert'

const Coverage = (props) => {
    const [name, setName] = useState(null)
    const [isValid, setIsValid] = useState(false)
    const [loading, setLoading] = useState(false)

    useEffect(() => {
        const isValid = name != null
        setIsValid(isValid)
    }, [name])

    const getCoverage = useCallback(async () => {
        try {
            const {data} = await axios.get(`/api/coverage/${id}`, {
                name
            })

            setName(data.name)
        } catch (err) {
            Alert(err)
        }
    })

    useEffect(() => {
        getCoverage().catch(noop)
    }, [props.id])

    const createCoverage = useCallback(async () => {
        try {
            const {data} = await axios.post('/api/coverage', {
                name
            })
            location.href = '/coverages'
        } catch (err) {
            Alert(err)
        }
    })

    const updateCoverage = useCallback(async () => {
        try {
            const {data} = await axios.put(`/api/coverage/${props.id}`, {
                name
            })
            location.href = '/coverages'
        } catch (err) {
            Alert(err)
        }
    })

    const handleSubmit = (e) => {
        e.preventDefault();

        if (props.id) {
            updateCoverage().catch(noop)
        } else {
            createCoverage().catch(noop)
        }
    }

    return (
        <div className="content">
            <div className="card">
                <div className="card-body">
                    <div className="box-header with-border" style={{marginBottom: '15px'}}>
                        <div className="col-12 text-right">
                            <a href={'/coverages'} className='btn btn-success'>
                                <i className="fa fa-plus"></i> Regresar a Coberturas
                            </a>
                        </div>
                    </div>
                    <div className="box-body">
                        <div className="col-xs-12 pt-3">
                            <form className="row" onSubmit={handleSubmit}>
                                <div className="form-group col-12">
                                    <label>Nombre:</label>
                                    <input type="text" className="form-control" onChange={({target}) => setName(target.value)} value={name}/>
                                </div>

                                <div className="form-group col-12 text-right">
                                    <button type="submit" className="btn btn-primary" disabled={!isValid || loading}>
                                        <span className="fa fa-save" /> {props.id ? 'Actualizar' : 'Registrar'}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    )

}

export default Coverage;

var element = document.getElementById('coverage')
if (element) {
    ReactDOM.render(<Coverage />, element)
}

var element = document.getElementById('coverage-get')
if (element) {
    ReactDOM.render(<Coverage id={id}/>, element)
}
